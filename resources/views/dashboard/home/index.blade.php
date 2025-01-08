@extends('dashboard.layout.master')
@section('menuDashboard', 'active')
@section('content')
    @if (Auth()->user()->peran == '1')
        @include('admin.index')
    @elseif (Auth()->user()->peran == '2')
        @include('pegawai.index')
    @endif
@endsection
@push('custom-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('cutiChart').getContext('2d');
            const cutiData = @json(array_values($cutiData));
            const labels = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Pengajuan Cuti',
                        data: cutiData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
