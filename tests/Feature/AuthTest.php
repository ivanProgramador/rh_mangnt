<?php

it('verificando se o cliente consegue acessar a home page sem estar logado ',function(){
    
    //tentativa de acesso 
    $result  = $this->get('/')->assertRedirect('/login');
    
    //lendo a resposta recebida pela requisição ela deve ser 302 
    //oque significa que o usuario não conseguiu entrar no sistema 

    expect($result->status())->toBe(302);

    //verificando se a tela de login aparece para o usuario quando ele solicita 

    expect($this->get('/login')->status())->toBe(200);

    //testando se a pagina que eu quero acessar tem um conteudo especifico " Esqueceu a sua senha? "
    
    expect($this->get('/login')->content())->toContain("Esqueceu a sua senha?");










});
