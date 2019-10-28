<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <form method="post" action="/arquivo/importar" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <label class="file-upload btn btn-primary">
                            <i class="fas fa-upload"></i> Upload XML<input type="file" name="arquivo"/>
                        </label>
                        <input type="submit" class="btn btn-success" vlaue="enviar">
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-responsive-lg table-hover mt-10">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Razão</th>
                <th>Documeto</th>
                <th>telefone</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($user->nome); ?></td>
                    <td><?php echo e($user->razao); ?></td>
                    <td><?php echo e($user->documento); ?></td>
                    <td><?php echo e($user->telefone); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <a href="#" class="btn btn-primary" data-iduser="<?php echo e($user->id); ?>"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger" data-iduser="<?php echo e($user->id); ?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4"></td>
                </tr>
            <?php endif; ?>
        </table>
        </tbody>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/projetos/microframework/app/views/inicio.blade.php ENDPATH**/ ?>