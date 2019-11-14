<form name="cartorio">
    <div class="preload"></div>
    <div class="row">
        <input type="hidden" name="id" value="{{ $cartorio->id }}">
        <div class="col-md-12">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $cartorio->nome }}">
        </div>
        <div class="col-md-12">
            <label for="razao">Razão social</label>
            <input type="text" name="razao" id="razao" class="form-control" value="{{ $cartorio->razao }}">
        </div>
        <div class="col-md-6">
            <label for="tabeliao">Tabelião</label>
            <input type="text" name="tabeliao" id="tabeliao" class="form-control" value="{{ $cartorio->tabeliao }}">
        </div>
        <div class="col-md-6">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $cartorio->email }}">
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
            <input type="text" name="documento" id="documento" class="cpf_cnpj form-control"
                   value="{{ $cartorio->documento }}" readonly>
        </div>
        <div class="col-md-6">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="phone form-control"
                   value="{{ $cartorio->telefone }}">
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
                @foreach($ufs as $uf)
                    <option value="{{ $uf['name'] }}"
                            {{$cartorio->endereco()->uf === $uf['name'] ? 'selected':''}}>
                        {{ $uf['description'] }}
                    </option>
                @endforeach
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
            <input type="text" name="cep" id="cep" class="cep form-control"
                   value="{{ $cartorio->endereco()->cep }}">
        </div>
    </div>
</form>
<script src="/app/public/js/jquery.funcoes.js"></script>