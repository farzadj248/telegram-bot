<?php $__env->startSection('content'); ?>
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header">
                <div class="row w-100">
                    <div class="col-xl-8">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                              <li class="breadcrumb-item active" aria-current="page"> سوالات </li>
                            </ol>
                          </nav>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("create-question")): ?>
                    <div class="col-xl-4 text-left">
                        <a href="<?php echo e(route('questions.create')); ?>" class="btn btn-primary">افزودن سوال جدید</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card mb-4">
                <h4 class="card-title p-4">سوالات</h4>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table custom-table text-dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>دسته بندی</th>
                                    <th>سوال</th>
                                    <th>پاسخ درست</th>
                                    <th>پاسخ های غلط</th>
                                    <th>امتیاز</th>
                                    <th>کاربر</th>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit-question','delete-question'])): ?>
                                    <th>عملیات</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="width:100px"><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($question->category->name); ?></td>
                                    <td><?php echo e($question->question); ?></td>
                                    <td><?php echo e($question->answer); ?></td>
                                    <td>
                                        <ul class="p-0">
                                            <?php if(empty(!$question->mis1)): ?>
                                            <li><?php echo e($question->mis1); ?></li>
                                            <?php endif; ?>

                                            <?php if(empty(!$question->mis2)): ?>
                                            <li><?php echo e($question->mis2); ?></li>
                                            <?php endif; ?>

                                            <?php if(empty(!$question->mis3)): ?>
                                            <li><?php echo e($question->mis3); ?></li>
                                            <?php endif; ?>

                                            <?php if(empty(!$question->mis4)): ?>
                                            <li><?php echo e($question->mis4); ?></li>
                                            <?php endif; ?>

                                            <?php if(empty(!$question->mis5)): ?>
                                            <li><?php echo e($question->mis5); ?></li>
                                            <?php endif; ?>

                                            <?php if(empty(!$question->mis6)): ?>
                                            <li><?php echo e($question->mis6); ?></li>
                                            <?php endif; ?>
                                        </ul>
                                    </td>
                                    <td><?php echo e($question->score); ?></td>
                                    <td>
                                        <?php echo e($question->user->name); ?><br>
                                        <?php echo e($question->user->email); ?>

                                    </td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['edit-question','delete-question'])): ?>
                                    <td style="width:100px">
                                        <div class="dropdown">
                                            <span class="p-2 btn" id="action<?php echo e($loop->index); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-dots-vertical"></i> </span>
                                            <div class="dropdown-menu text-right" aria-labelledby="action<?php echo e($loop->index); ?>" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("edit-question")): ?>
                                                <a class="dropdown-item" href="<?php echo e(route('questions.edit', $question->id)); ?>"><i class="mdi mdi-lead-pencil"></i> ویرایش</a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("delete-question")): ?>
                                                <a class="dropdown-item" href="#" onclick="deleteItem(<?php echo e($question->id); ?>)"><i class="mdi mdi-trash-can-outline"></i> حذف</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("delete-question")): ?>
                                        <form id="delete-form-<?php echo e($question->id); ?>" action="<?php echo e(route('questions.destroy',$question->id)); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/telegram-bot/resources/views/pages/questions/index.blade.php ENDPATH**/ ?>