<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col text-right">
                <form name="importar-registros" method="post" action="/arquivo/importar"
                      enctype=class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-12">
                            <label class="file-upload btn btn-primary mt-2">
                                Upload XML <input type="file" name="arquivo" id="arquivo"/>
                            </label>
                            <input type="submit" class="btn btn-success" vlaue="enviar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="preload"></div>
        <table class="table table-responsive-lg table-hover mt-10">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Razão</th>
                <th>Documeto</th>
                <th>telefone</th>
                <th>E-mail</th>
                <th>Endereco</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $cartorios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartorio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($cartorio->nome); ?></td>
                    <td><?php echo e($cartorio->razao); ?></td>
                    <td><?php echo e($cartorio->documento); ?></td>
                    <td><?php echo e($cartorio->telefone); ?></td>
                    <td><?php echo e($cartorio->email); ?></td>
                    <td>
                        <?php echo e($cartorio->endereco()->nome); ?>, <?php echo e($cartorio->endereco()->bairro); ?>,
                        <?php echo e($cartorio->endereco()->cidade); ?> - <?php echo e($cartorio->endereco()->uf); ?>

                        , <?php echo e($cartorio->endereco()->cep); ?>

                    </td>
                    <td>
                        <a href="#" class="btn btn-primary" data-iduser="<?php echo e($cartorio->id); ?>"
                           data-target="#update-cartorio" data-toggle="modal"><i
                                    class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger delete-cartorio" data-iduser="<?php echo e($cartorio->id); ?>"><i
                                    class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7"></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/projetos/microframework/app/views/inicio.blade.php ENDPATH**/ ?>