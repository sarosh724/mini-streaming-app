<?php

use App\Models\MusicCategory;

function allMusicCategories(){
    return MusicCategory::all();
}

function getCategoryName($id){
    return MusicCategory::find($id,['name'])->name;
}

function loadChartScripts()
{
    return '
        <!-- High charts -->
        <script src="'.asset('assets/admin/highchart/highcharts.js').'"></script>
        <script src="'.asset('assets/admin/highchart/highcharts-more.js').'"></script>
        <script src="'.asset('assets/admin/highchart/exporting.js').'"></script>
        <script src="'.asset('assets/admin/highchart/export-data.js').'"></script>
        <script src="'.asset('assets/admin/highchart/accessibility.js').'"></script>
        <script src="'.asset('assets/admin/highchart/gauge.js').'"></script>
        <script src="'.asset('assets/admin/highchart/solid-gauge.js').'"></script>
        <script src="'.asset('assets/admin/highchart/funnel.js').'"></script>
        <script src="'.asset('assets/admin/highchart/chart.js').'"></script>';
}
