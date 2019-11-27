@extends('layouts.default')

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
@stop
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="preload"></div>
            <div class="card-body">
                <h5 class="card-title">Enviar e-mail para cartórios</h5>
                <form>
                    <div class="col-md-6 col-sm-12">
                        <label for="subjetc">Assunto: <span class="text-danger">*</span></label>
                        <input type="text" name="subject" id="subjetc" class="form-control required mb-2" value="">
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <label for="editor1">Mensagem: <span class="text-danger">*</span></label>
                        <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor
                            // instance, using default configuration.
                            CKEDITOR.replace('editor1');
                        </script>
                    </div>
                    <div class="col mt-4">
                        <div class="form-group float-right">
                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-success">Enviar</button>
                                <button type="reset" class="btn btn-primary">Limpar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop