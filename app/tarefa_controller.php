<?php
    require "tarefa_model.php";
    require "tarefa_service.php";
    require "conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if (isset($_GET['acao']) && $_GET['acao'] == 'inserir') {

        $tarefa = new TarefaModel();
        $tarefa->__set("tarefa", $_POST["tarefa"]);
    
        $conexao = new Conexao();
    
        $service = new TarefaService($conexao, $tarefa);
        $service->inserir();
    
        header('Location: nova_tarefa.php?inclusao=1');

    } else if ($acao == "recuperar") {
        $tarefa = new TarefaModel();

        $conexao = new Conexao();
        
        $service = new TarefaService($conexao, $tarefa);
        
        $tarefas = $service->recuperar();

    } else if ($acao == 'atualizar') {
        $tarefa = new TarefaModel();
        $tarefa->__set('id', $_POST['id']);
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $service = new TarefaService($conexao, $tarefa);

        if($service->atualizar()) {
            header('location: '.$_GET['pagina']);
        }

    } else if ($acao == 'remover') {
        $tarefa = new TarefaModel();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $service = new TarefaService($conexao, $tarefa);

        $service->remover();

        header('location: '.$_GET['pagina']);

    } else if ($acao == 'marcarComoRealizada') {
        $tarefa = new TarefaModel();
        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 2);
        
        $conexao = new Conexao();

        $service = new TarefaService($conexao, $tarefa);
        if($service->marcarComoRealizada()) {
            header('location: '.$_GET['pagina']);
        }
    }
?>