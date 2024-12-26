<?php $__env->startSection('content'); ?>
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header">
                <div class="row w-100">
                    <div class="col-xl-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                              <li class="breadcrumb-item active" aria-current="page"> پرسنل </li>
                            </ol>
                          </nav>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("create-personel")): ?>
                    <div class="col-xl-4 text-left">
                        <a href="<?php echo e(route('admin.personel.create')); ?>" class="btn btn-primary">افزودن پرسنل جدید</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card mb-4">
                <h4 class="card-title p-4">پرسنل</h4>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table custom-table text-dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>ایمیل</th>
                                    <th>نقش</th>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit-personel','delete-personel'])): ?>
                                    <th>عملیات</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->roles->first()->name); ?></td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit-personel','delete-personel'])): ?>
                                    <td style="width:100px">
                                        <div class="dropdown">
                                            <span class="p-2 btn" id="action<?php echo e($loop->index); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </span>
                                            <div class="dropdown-menu text-right" aria-labelledby="action<?php echo e($loop->index); ?>" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("edit-personel")): ?>
                                                <a class="dropdown-item" href="<?php echo e(route('admin.personel.edit',$user->id)); ?>"><i class="mdi mdi-lead-pencil"></i>ویرایش اطلاعات</a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("delete-personel")): ?>
                                                <a class="dropdown-item" href="#" onclick="deleteItem(<?php echo e($user->id); ?>)"><i class="mdi mdi-trash-can-outline"></i> حذف</a>
                                                <form id="delete-form-<?php echo e($user->id); ?>" action="<?php echo e(route('admin.personel.destroy',$user->id)); ?>" method="POST" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/telegram-bot/resources/views/pages/personels/index.blade.php ENDPATH**/ ?>