@extends('layouts.frontend')

@section('content')
<div class="content-wrapper">

        <!-- Stunning Header -->
        
        <div class="stunning-header stunning-header-bg-lightviolet">
            <div class="stunning-header-content">
                <h1 class="stunning-header-title">Category: {{ $title }}</h1>
            </div>
        </div>
        
        <!-- End Stunning Header -->
        
        <!-- Post Details -->
        
        
        <div class="container">
            <div class="row medium-padding120">
                <main class="main">
                    
                    <div class="row">
                                <div class="case-item-wrap">
                                    @if ($category->posts->count() > 0)
                                        @foreach ($category->posts as $post)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="case-item">
                                                    <div class="case-item__thumb">
                                                        <img src="{{ $post->featured }}" alt="{{ $post->title }}">
                                                    </div>
                                                    <h6 class="case-item__title "><a href="{{ route('single.post',['slug'=>$post->slug]) }}">{{ $post->title }}</a></h6>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h6 class="case-item__title text-center ">Sorry!! No Available Post Yet.</h6>  
                                    @endif
                                </div>
                    </div>
        
                    <!-- End Post Details -->
                    <br>
                    <br>
                    <br>
                    <!-- Sidebar-->
        
                    <div class="col-lg-12">
                        <aside aria-label="sidebar" class="sidebar sidebar-right">
                            <div  class="widget w-tags">
                                <div class="heading text-center">
                                    <h4 class="heading-title">ALL BLOG TAGS</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
        
                                <div class="tags-wrap">
                                    @if ($tags)
                                        @foreach ($tags as $tag)
                                            <a href="{{ route('tag.single',['id'=>$tag->id]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </aside>
                    </div>
        
                    <!-- End Sidebar-->
        
                </main>
            </div>
        </div>
        
        
        </div>
@endsection