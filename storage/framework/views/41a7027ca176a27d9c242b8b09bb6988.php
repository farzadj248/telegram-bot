<?php $__env->startSection('content'); ?>
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header">
                <div class="row w-100">
                    <div class="col-xl-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                              <li class="breadcrumb-item active" aria-current="page"> دسته بندی ها </li>
                            </ol>
                        </nav>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("create-category")): ?>
                    <div class="col-xl-4 text-left">
                        <button data-toggle="modal" data-target="#addModal" class="btn btn-primary">افزودن دسته بندی جدید</button>

                        <div id="addModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="<?php echo e(route('categories.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("POST"); ?>

                                        <div class="modal-header">
                                            <h4 class="modal-title">افزودن دسته بندی جدید</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">عنوان <span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" required name="name" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-ltr">
                                            <button type="submit" class="btn btn-primary">انتشار</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
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

            <div class="card mb-4">
                <h4 class="card-title p-4">دسته بندی</h4>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table custom-table text-dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit-category','delete-category'])): ?>
                                    <th>عملیات</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="width:100px"><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit-category','delete-category'])): ?>
                                        <td style="width: 100px">
                                            <div class="dropdown">
                                                <span class="p-2 btn" id="action<?php echo e($loop->index); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </span>
                                                <div class="dropdown-menu text-right" aria-labelledby="action<?php echo e($loop->index); ?>" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-category')): ?>
                                                    <a class="dropdown-item" data-toggle="modal" href="#editModal<?php echo e($loop->index); ?>"><i class="mdi mdi-lead-pencil"></i> ویرایش</a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-category')): ?>
                                                    <a class="dropdown-item" href="#" onclick="deleteItem(<?php echo e($category->id); ?>)"><i class="mdi mdi-trash-can-outline"></i> حذف</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-category')): ?>
                                            <form id="delete-form-<?php echo e($category->id); ?>" action="<?php echo e(route('categories.destroy',$category->id)); ?>" method="POST" style="display: none;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-category')): ?>
                                            <div id="editModal<?php echo e($loop->index); ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="<?php echo e(route('categories.update', $category->id)); ?>" method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field("PUT"); ?>

                                                            <div class="modal-header">
                                                                <h4 class="modal-title">ویرایش دسته بندی</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">عنوان <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" value="<?php echo e($category->name); ?>" required name="name" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer d-ltr">
                                                                <button type="submit" class="btn btn-primary">اعمال تغییرات</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if($data->count()==0): ?>
                                    <tr>
                                        <td colspan="9"  class="text-center p-4">موردی برای نمایش وجود ندارد.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination mt-4">
                        <?php echo e($data->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
    <script type="text/javascript">
    function deleteItem(id) {
        Swal.fire({
            title: "Do you want to delet the item?",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "حذف",
            denyButtonText: `کنسل`
        }).then((result) => {
            if (result.isConfirmed) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/telegram-bot/resources/views/pages/categories/index.blade.php ENDPATH**/ ?>