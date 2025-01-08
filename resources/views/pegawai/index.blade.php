<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 d-flex flex-column justify-content-center align-items-start text-center text-lg-start py-4">
                            <h3 class="mb-3">Halo, {{ Auth()->user()->name ?? '-' }} 👋</h3>
                            <h6 class="mb-2 text-muted">Selamat datang kembali! Semoga hari Anda produktif dan penuh semangat.</h6>
                            <p class="text-secondary">Jangan ragu untuk menjelajahi fitur-fitur kami dan menyelesaikan tugas Anda dengan mudah.</p>
                        </div>
                        <div class="col-lg-4 text-center">
                            <img src="{{ asset('images/undraw.png') }}" style="width: 300px; object-fit: cover; height: 300px;" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
