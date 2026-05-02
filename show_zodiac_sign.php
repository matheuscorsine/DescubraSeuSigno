<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <?php        
        $data_nascimento = $_POST['data_nascimento'];

        if (empty($data_nascimento)) {
            echo "<div class='alert alert-danger'>Data inválida!</div>";
        } else {
            $signos = simplexml_load_file("signos.xml");

            $data_nasc_formatada = date('m-d', strtotime($data_nascimento));

            $signo_encontrado = null;

            foreach ($signos->signo as $signo) {
                $inicio = explode('/', $signo->dataInicio);
                $fim = explode('/', $signo->dataFim);

                $data_inicio_formatada = $inicio[1] . "-" . $inicio[0];
                $data_fim_formatada = $fim[1] . "-" . $fim[0];

                if ($data_inicio_formatada > $data_fim_formatada){
                    if ($data_nasc_formatada >= $data_inicio_formatada || $data_nasc_formatada <= $data_fim_formatada) {
                        $signo_encontrado = $signo;
                        break;
                    }
                } else {
                    if ($data_nasc_formatada >= $data_inicio_formatada && $data_nasc_formatada <= $data_fim_formatada) {
                        $signo_encontrado = $signo;
                        break;
                    }
                }
            }

            if ($signo_encontrado) {
            
                echo "<div class='card shadow text-center py-5 mb-4'>";
                echo "<div class='card-body'>";
                echo "<h1 class='display-4 fw-bold' style='color: #4ecca3;'>" . $signo_encontrado->signoNome . "</h1>";
                echo "<p class='lead mt-4 px-4'>" . $signo_encontrado->descricao . "</p>";
                echo "<hr class='my-4 bg-light'>";
                echo "<a href='index.php' class='btn btn-primary px-5'>Consultar outro signo</a>";
                echo "</div></div>";

                echo "<div class='signo-animado-container text-center'>";
                
                $caminho_svg = (string) $signo_encontrado->foto;
                if(file_exists($caminho_svg)) {
                    $svg_content = file_get_contents($caminho_svg);
                    echo $svg_content;
                }
                echo "</div>";
            } else {
                echo "<div class='alert alert-warning'>Não foi possível determinar o signo.</div>";
            }
        }
        ?>
        </div>
    </div>
</div>

</body>
</html>
