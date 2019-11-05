<form>
    <div class="preload"></div>
    <div class="row">
        <div class="col-md-12">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $cartorio->nome }}">
        </div>
        <div class="col-md-12">
            <label for="razao">Razão social</label>
            <input type="text" name="razao" id="razao" class="form-control"value="{{ $cartorio->razao }}">
        </div>
        <div class="col-md-6">
            <label for="tipo_documento">Tipo documento</label>
            <select name="tipo_documento" id="tipo_documento" class="form-control">
                <option value="">Selecione...</option>
                <option value="1"{{ $cartorio->tipo_documento === '1' ? " selected": '' }}>CPF</option>
                <option value="2"{{ $cartorio->tipo_documento === '2' ? " selected": '' }}>CNPJ</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="documento">Documento</label>
            <input type="text" name="documento" id="documento" class="form-control"
                   value="{{ \App\Helpers\Helper::mask('CNPJ', $cartorio->documento) }}" readonly>
        </div>
        <div class="col-md-6">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control"
                   value="{{ \App\Helpers\Helper::mask('TELEFONE', $cartorio->telefone) }}">
        </div>
        <div class="col-md-6">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $cartorio->email }}">
        </div>
        <div class="col-md-6">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control"
                   value="{{ $cartorio->endereco()->nome }}">
        </div>
        <div class="col-md-6">
            <label for="uf">UF</label>
            <select name="uf" id="uf" class="form-control">
                <option value="">Selecione...</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control"
                   value="{{ $cartorio->endereco()->cidade }}">
        </div>
        <div class="col">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro" class="form-control"
                   value="{{ $cartorio->endereco()->bairro }}">
        </div>
        <div class="col-md-6">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control"
                   value="{{ \App\Helpers\Helper::mask('CEP', $cartorio->endereco()->cep) }}">
        </div>
    </div>
</form>