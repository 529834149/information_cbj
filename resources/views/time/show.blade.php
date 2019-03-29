@extends('layouts.app')
@section('title', '首页')

@section('content')

   <div class="micronews-container micronews-search-container w1000">
      <div class="layui-fluid">
         <p class="num">为您找到相关结果为<span> &nbsp;{{count($time_article)}}&nbsp; </span>个</p>
         @foreach($time_article as $v)
         <div class="item-list">
            <div class="item">
               <h4><a href="{{ route('topics.show', $v->id) }}">{{ $v->title }} </a><span class="time">{{ $v->created_at->diffForHumans() }}</span></h4>
               <p>{{ $v->excerpt }}</p>
            </div>
         </div>
         @endforeach
         <div id="micronews-search-test" style="text-align: center; padding:30px 0"></div>
      </div>
   </div>
@stop