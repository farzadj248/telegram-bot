<?php $__env->startSection('content'); ?>
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
                <div class="header-left">
                    <button class="btn btn-primary mb-2 mb-md-0 mr-2"> Create new document </button>
                    <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import documents </button>
                </div>
                <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                    <div class="d-flex align-items-center">
                        <a href="#">
                            <p class="m-0 pr-3">Dashboard</p>
                        </a>
                        <a class="pl-3 mr-4" href="#">
                            <p class="m-0">ADE-00234</p>
                        </a>
                    </div>
                    <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                        <i class="mdi mdi-plus-circle"></i> Add Prodcut </button>
                </div>
            </div>
            <!-- first row starts here -->
            <div class="row">
                <div class="col-xl-9 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div>
                                    <div class="card-title mb-0">Sales Revenue</div>
                                    <h3 class="font-weight-bold mb-0">$32,409</h3>
                                </div>
                                <div>
                                    <div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
                                        <div class="d-flex mr-5">
                                            <button type="button" class="btn btn-social-icon btn-outline-sales">
                                                <i class="mdi mdi-inbox-arrow-down"></i>
                                            </button>
                                            <div class="pl-2">
                                                <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                                                <span class="font-10 font-weight-semibold text-muted">TOTAL SALES</span>
                                            </div>
                                        </div>
                                        <div class="d-flex mr-3 mt-2 mt-sm-0">
                                            <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                                                <i class="mdi mdi-cash text-info"></i>
                                            </button>
                                            <div class="pl-2">
                                                <h4 class="mb-0 font-weight-semibold head-count"> 2,804 </h4>
                                                <span class="font-10 font-weight-semibold text-muted">TOTAL PROFIT</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted font-13 mt-2 mt-sm-0"> Your sales monitoring dashboard template. <a
                                    class="text-muted font-13" href="#"><u>Learn more</u></a>
                            </p>
                            <div class="flot-chart-wrapper">
                                <div id="flotChart" class="flot-chart">
                                    <canvas class="flot-base"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 stretch-card grid-margin">
                    <div class="card card-img">
                        <div class="card-body d-flex align-items-center">
                            <div class="text-white">
                                <h1 class="font-20 font-weight-semibold mb-0"> Get premium </h1>
                                <h1 class="font-20 font-weight-semibold">account!</h1>
                                <p>to optimize your selling prodcut</p>
                                <p class="font-10 font-weight-semibold"> Enjoy the advantage of premium. </p>
                                <button class="btn bg-white font-12">Get Premium</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- chart row starts here -->
            <div class="row">
                <div class="col-sm-6 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-title"> Customers <small class="d-block text-muted">August 01 - August
                                        31</small>
                                </div>
                                <div class="d-flex text-muted font-20">
                                    <i class="mdi mdi-printer mouse-pointer"></i>
                                    <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
                                </div>
                            </div>
                            <h3 class="font-weight-bold mb-0"> 2,409 <span class="text-success h5">4,5%<i
                                        class="mdi mdi-arrow-up"></i></span>
                            </h3>
                            <span class="text-muted font-13">Avg customers/Day</span>
                            <div class="line-chart-wrapper">
                                <canvas id="linechart" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-title"> Conversions <small class="d-block text-muted">August 01 - August
                                        31</small>
                                </div>
                                <div class="d-flex text-muted font-20">
                                    <i class="mdi mdi-printer mouse-pointer"></i>
                                    <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
                                </div>
                            </div>
                            <h3 class="font-weight-bold mb-0"> 0.40% <span class="text-success h5">0.20%<i
                                        class="mdi mdi-arrow-up"></i></span>
                            </h3>
                            <span class="text-muted font-13">Avg customers/Day</span>
                            <div class="bar-chart-wrapper">
                                <canvas id="barchart" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- image card row starts here -->
            <div class="row">
                <div class="col-sm-4 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body p-0">
                            <img class="img-fluid w-100" src="../assets/images/dashboard/img_1.jpg" alt="" />
                        </div>
                        <div class="card-body px-3 text-dark">
                            <div class="d-flex justify-content-between">
                                <p class="text-muted font-13 mb-0">ENTIRE APARTMENT</p>
                                <i class="mdi mdi-heart-outline"></i>
                            </div>
                            <h5 class="font-weight-semibold"> Cosy Studio flat in London </h5>
                            <div class="d-flex justify-content-between font-weight-semibold">
                                <p class="mb-0">
                                    <i class="mdi mdi-star star-color pr-1"></i>4.60 (35)
                                </p>
                                <p class="mb-0">$5,267/night</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body p-0">
                            <img class="img-fluid w-100" src="../assets/images/dashboard/img_2.jpg" alt="" />
                        </div>
                        <div class="card-body px-3 text-dark">
                            <div class="d-flex justify-content-between">
                                <p class="text-muted font-13 mb-0">ENTIRE APARTMENT</p>
                                <i class="mdi mdi-heart-outline"></i>
                            </div>
                            <h5 class="font-weight-semibold"> Victoria Bedsit Studio Ensuite </h5>
                            <div class="d-flex justify-content-between font-weight-semibold">
                                <p class="mb-0">
                                    <i class="mdi mdi-star star-color pr-1"></i>4.83 (12)
                                </p>
                                <p class="mb-0">$6,144/night</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body p-0">
                            <img class="img-fluid w-100" src="../assets/images/dashboard/img_3.jpg" alt="" />
                        </div>
                        <div class="card-body px-3 text-dark">
                            <div class="d-flex justify-content-between">
                                <p class="text-muted font-13 mb-0">ENTIRE APARTMENT</p>
                                <i class="mdi mdi-heart-outline"></i>
                            </div>
                            <h5 class="font-weight-semibold">Fabulous Huge Room</h5>
                            <div class="d-flex justify-content-between font-weight-semibold">
                                <p class="mb-0">
                                    <i class="mdi mdi-star star-color pr-1"></i>3.83 (15)
                                </p>
                                <p class="mb-0">$5,267/night</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/telegram-bot/resources/views/index.blade.php ENDPATH**/ ?>