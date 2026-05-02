<?php include('layouts/header.php'); ?> <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 text-primary">Descubra seu Signo</h2>

                    <form id="signo-form" method="post" action="show_zodiac_sign.php">
                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label">Qual a sua data de nascimento?</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Descobrir Signo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>