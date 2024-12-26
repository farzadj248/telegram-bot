<?php $__env->startSection('content'); ?>
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header">
                <div class="row w-100">
                    <div class="col-xl-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                              <li class="breadcrumb-item active" aria-current="page"> نقش ها </li>
                            </ol>
                          </nav>
                    </div>
                    <div class="col-xl-4 text-left">
                        <a data-toggle="modal" data-target="#addModal" class="btn btn-primary">افزودن نقش جدید</a>

                        <div id="addModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="<?php echo e(route('admin.role.store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("POST"); ?>
                                        <div class="modal-header">
                                            <h4 class="modal-title">افزودن نقش جدید</h4>
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
                                            <button type="submit" class="btn btn-primary">افزودن</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(session()->has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('message')); ?>

                </div>
            <?php endif; ?>

            <div class="card mb-4">
                <h4 class="card-title p-4">نقش ها</h4>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table custom-table text-dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="width: 100px"><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($role->name); ?></td>
                                    <td style="width:100px">
                                        <div class="dropdown">
                                            <span class="p-2 btn" id="action<?php echo e($loop->index); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </span>
                                            <div class="dropdown-menu text-right" aria-labelledby="action<?php echo e($loop->index); ?>" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                                <?php if($role->id!=1): ?>
                                                    <a class="dropdown-item" data-toggle="modal" href="#permissionModal<?php echo e($loop->index); ?>"><i class="mdi mdi-account-key"></i>دسترسی ها</a>
                                                    <a class="dropdown-item" data-toggle="modal" href="#editModal<?php echo e($loop->index); ?>"><i class="mdi mdi-lead-pencil"></i>ویرایش</a>
                                                    <a class="dropdown-item" href="#" onclick="deleteItem(<?php echo e($role->id); ?>)"><i class="mdi mdi-trash-can-outline"></i> حذف</a>
                                                    <form id="delete-form-<?php echo e($role->id); ?>" action="<?php echo e(route('admin.role.destroy',$role->id)); ?>" method="POST" style="display: none;">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if($role->id!=1): ?>
                                        <div id="editModal<?php echo e($loop->index); ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="<?php echo e(route('admin.role.update', $role->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field("PUT"); ?>

                                                        <div class="modal-header">
                                                            <h4 class="modal-title">ویرایش</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">عنوان <span class="text-danger">*</span></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" value="<?php echo e($role->name); ?>" required name="name" placeholder="">
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

                                        <div id="permissionModal<?php echo e($loop->index); ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <form action="<?php echo e(route('admin.permission.update', $role->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field("PUT"); ?>

                                                        <div class="modal-header">
                                                            <h4 class="modal-title">ویرایش</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-12 mb-3">
                                                                    <button class="w-100 btn btn-success" data-toggle="collapse" data-target="#collapse<?php echo e($loop->index); ?>" type="button"><?php echo e($key); ?></button>
                                                                    <div id="collapse<?php echo e($loop->index); ?>" class="collapse my-3">
                                                                        <div class="row">
                                                                            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <div class="col-xl-6 col-4">
                                                                                    <div class="form-group">
                                                                                        <div class="form-check form-check-primary">
                                                                                            <label class="form-check-label">
                                                                                                <?php
                                                                                                    $checked = false;
                                                                                                    foreach ($role->permissions as $item){
                                                                                                        if ($item->name == $permission['name'])
                                                                                                        {
                                                                                                            $checked = true;
                                                                                                            break;
                                                                                                        }
                                                                                                    }
                                                                                                ?>
                                                                                                <input type="checkbox" class="form-check-input" <?php if($checked): ?> checked="" <?php endif; ?> name="<?php echo e($permission['name']); ?>"> <?php echo e($permission['name']); ?> <i class="input-helper"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/telegram-bot/resources/views/pages/roles/index.blade.php ENDPATH**/ ?>