@extends('layouts.default')

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
@stop
@section('content')
    <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title">Enviar Email Cartórios</h5>
                </div>
                <div class="card-body">
                    <form>
                        <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor
                            // instance, using default configuration.
                            CKEDITOR.replace( 'editor1' );
                        </script>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="col">
                        <div class="form-group float-right">
                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-success">Enviar</button>
                                <button type="reset" class="btn btn-primary">Limpar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop