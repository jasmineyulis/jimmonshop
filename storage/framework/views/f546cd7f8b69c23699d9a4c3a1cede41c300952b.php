<?php $__env->startSection('content'); ?>
    <div class="content" style="padding-bottom: 40px">
        <div class="col-lg-8" style="padding-bottom: 10px">
            <form method="POST" action="/dashboard/events/<?php echo e($event->slug); ?>">
                <?php echo method_field('put'); ?>
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama_event" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nama_event" name="nama_event" required value="<?php echo e(old('nama_event',$event->nama_event)); ?>">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" required value="<?php echo e(old('slug',$event->slug)); ?>">
                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <div class="invalid-feedback">
                       <?php echo e($message); ?>

                   </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-3">
                    <label for="admin_id" class="form-label">Admin</label> <br>
                    <select class="form-select" name="admin_id" id="admin_id">
                        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(old('admin_id') == $admin->id): ?>
                                <option value=<?php echo e($admin->id); ?> selected><?php echo e($admin->name); ?></option>
                            <?php else: ?>
                                <option value=<?php echo e($admin->id); ?>><?php echo e($admin->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" class="form-control" id="image" name="image" required value="<?php echo e(old('image',$event->image)); ?>">
                </div>
                <div class="mb-3">
                    <label for="pemateri" class="form-label">Speaker</label>
                    <input type="text" class="form-control" id="pemateri" name="pemateri" required value="<?php echo e(old('pemateri',$event->pemateri)); ?>">
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Date</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?php echo e(old('tanggal',$event->tanggal)); ?>">
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Time</label>
                    <input type="time" class="form-control" id="waktu" name="waktu" required value="<?php echo e(old('waktu',$event->waktu)); ?>">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" required value="<?php echo e(old('location',$event->location)); ?>">
                </div>
                <div class="mb-3">
                    <label for="benefits" class="form-label">Benefits</label>
                    <input id="benefits" type="hidden" name="benefits" required value="<?php echo e(old('benefits',$event->benefits)); ?>">
                    <trix-editor input="benefits" style="background-color: white"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">Update Event</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ROBANU DAKHAYIN\Documents\ApplicationWeb\jimmonshop\resources\views/dashboard/events/edit.blade.php ENDPATH**/ ?>