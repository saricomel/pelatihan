@extends('layouts.template')
@section('judulh1','Admin - Dashboard')

@section('konten')

<div class="container-fluid">

    <!-- =========================================================== -->
                <!-- /.info-box-content -->
                </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->        
        </thead>
        
    
    
    
    
            <!-- =========================================================== -->
            <h1 class="h3 mb-1 mt-3">
                <strong>manajemen</strong> Tercatat
            </h1>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-gradient-info">
                    <span class="info-box-icon"><i class="nav-icon fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">User</span>
                        <span class="info-box-number">{{$user}}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-success">
                    <span class="info-box-icon"><i class="nav-icon fas fa-store"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Umkm</span>
                        <span class="info-box-number">{{$umkm}}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-warning">
                    <span class="info-box-icon"><i class="nav-icon fas fa-chalkboard-teacher"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">pembinaan</span>
                        <span class="info-box-number">{{$pembinaan}}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
 <!-- /.info-box-content -->
 </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->


    @endsection