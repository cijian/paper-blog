<?php

namespace App\Exports;

namespace App\Admin\Extensions;

use Encore\Admin\Grid\Exporters\ExcelExporter;
use Maatwebsite\Excel\Concerns\WithMapping;

class ArticleExport extends ExcelExporter implements WithMapping
{
    protected $fileName = '文章列表.xlsx';

    protected $headings = [
        'ID',
        '标题',
        '描述',
        '分类名称',
        '标签',
        '内容',
        '发布时间',
        '排序',
        '是否展示',
        '创建时间',
        '更新时间',
    ];
//    protected $columns = [
//        'id'      => 'ID',
//        'title'   => '标题',
//        'describe' => '描述',
//        'classify_id' => '分类ID',
//        'classify.name' => '分类名称',
//        'labels' => '标签',
//        'content' => '内容',
//        'publish' => '发布时间',
//        'sort' => '排序',
//        'display' => '是否展示',
//        'created_at' => '创建时间',
//        'updated_at' => '更新时间',
//    ];

    public function map($article) : array
    {
        $labels = data_get($article, 'labels');

        $label = $labels->implode('label_name', ', ');
        return [
            $article->id,
            $article->title,
            $article->describe,
            data_get($article, 'classify.name'),
            $label,
            $article->content,
            $article->publish,
            $article->sort,
            $article->display == 1?'是':'否',
            $article->created_at,
            $article->updated_at,
        ];
    }

}
