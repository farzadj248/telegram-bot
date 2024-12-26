<?php $__env->startSection('content'); ?>
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header">
                <div class="row w-100">
                    <div class="col-xl-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                              <li class="breadcrumb-item" aria-current="page"> سوالات </li>
                              <li class="breadcrumb-item active" aria-current="page"> افزودن سوال جدید </li>
                            </ol>
                          </nav>
                    </div>
                    <div class="col-xl-4 text-left">
                        <a href="<?php echo e(route('questions.index')); ?>" class="btn btn-outline-primary">بازگشت</a>
                    </div>
                </div>
            </div>

            <?php if(session()->has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('message')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">سوال جدید</h4>
                    <p class="card-description">طرح سوال جدید</p>
                    <form class="forms-sample" method="POST" action="<?php echo e(route('questions.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("POST"); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">سوال <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo e(old('question')); ?>" required name="question" placeholder="question">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label">پاسخ <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                        <textarea class="form-control" value="<?php echo e(old('answer')); ?>" required name="answer" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط ۱</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo e(old('mis1')); ?>" name="mis1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط 2</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo e(old('mis2')); ?>" name="mis2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط 3</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo e(old('mis3')); ?>" name="mis3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط 4</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo e(old('mis4')); ?>" name="mis4">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط 5</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo e(old('mis5')); ?>" name="mis5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">پاسخ غلط 6</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo e(old('mis6')); ?>" name="mis6">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">دسته بندی <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required name="category_id">
                                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">امتیاز</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="score">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <button type="submit" class="btn btn-primary mr-2"> انتشار </button>
                        <a href="<?php echo e(route('questions.create')); ?>" class="btn btn-light" >خالی کردن فرم</a>
                    </form>
                  </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/telegram-bot/resources/views/pages/questions/create.blade.php ENDPATH**/ ?>