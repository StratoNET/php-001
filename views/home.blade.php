@extends('base')

@section('pagetitle')
  Cycling | Welcome
@stop

@section('pagecontent')
           <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
             <!-- Indicators -->
             <ol class="carousel-indicators">
               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
               <li data-target="#carousel-example-generic" data-slide-to="2"></li>
               <li data-target="#carousel-example-generic" data-slide-to="3"></li>
             </ol>

             <!-- Wrapper for slides -->
             <div class="carousel-inner" role="listbox">
               <div class="item active">
                 <img src="/assets/slider/cycling_1.jpg" alt="Road Racing !">
                 <div class="carousel-caption">
                   <h3>Road Racing !</h3>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                 </div>
               </div>
               <div class="item">
                 <img src="/assets/slider/cycling_2.jpg" alt="The open road...">
                 <div class="carousel-caption">
                   <h3>The open road...</h3>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                 </div>
               </div>
               <div class="item">
                 <img src="/assets/slider/cycling_3.jpg" alt="Monochrome speeders !">
                 <div class="carousel-caption">
                   <h3>Monochrome speeders !</h3>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                 </div>
               </div>
               <div class="item">
                 <img src="/assets/slider/cycling_4.jpg" alt="The open road, in another land...">
                 <div class="carousel-caption">
                   <h3>The open road, in another land...</h3>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                 </div>
               </div>
             </div>

             <!-- Controls -->
             <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
             </a>
             <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
             </a>
           </div>

           <!-- Jumbotron spacing from Carousel -->
           <div class="row">
             <br/>
           </div>

           <!-- Main component for a primary marketing message or call to action -->
           <div class="jumbotron">
             <h1>Cycling for everyone...</h1>
             <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
             <p>
               <a class="btn btn-lg btn-primary" href="/register" role="button">Register &nbsp;&raquo;</a>
             </p>
            </div>
@stop
