@extends('template')

@section('content')
{{-- <div class="main-panel"> --}}
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Selamat Datang</h3>
              <h6 class="font-weight-normal mb-0">join webinar dan tambah pengalaman!!</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card tale-bg same-size-card p-3">
              <div class="card-people mt-auto text-center">
                  <img src="{{ asset('asset/images/dashboard/people.svg') }}" alt="people">
                  <div class="webinar-info mt-3">
                      <ul class="webinar-details text-justify">
                          <li><strong>Nama Webinar:</strong> Pengenalan AI</li>
                          <li><strong>Nama Pemateri:</strong> Dr. Siti Nurbaya</li>
                          <li><strong>Lokasi:</strong> Kampus A, Surabaya</li>
                          <li><strong>Waktu:</strong> Minggu, 16 Desember 2024 - 13:00 WIB</li>
                      </ul>
                      {{-- <button class="btn btn-primary mt-3" onclick="window.location.href='{{ route('pembeli.modal') }}'" style="color: white;">
                        Daftar Webinar
                      </button> --}}
              </div>
          </div>
        </div>
    
        </div>

        <div class="col-md-4 grid-margin stretch-card">
          <div class="card tale-bg same-size-card p-3">
              <div class="card-people mt-auto text-center">
                  <img src="{{ asset('asset/images/dashboard/people.svg') }}" alt="people">
                  <div class="webinar-info mt-3">
                      <ul class="webinar-details text-justify">
                          <li><strong>Nama Webinar:</strong> Teknologi Masa Depan</li>
                          <li><strong>Nama Pemateri:</strong> Dr. Andi Wijaya</li>
                          <li><strong>Lokasi:</strong> Gedung Serba Guna, Jakarta</li>
                          <li><strong>Waktu:</strong> Sabtu, 15 Desember 2024 - 09:00 WIB</li>
                      </ul>
                      {{-- <button class="btn btn-primary mt-3" onclick="window.location.href='{{ route('pembeli.modal') }}'" style="color: white;">
                        Daftar Webinar
                      </button> --}}
                  </div>
              </div>
          </div>
      </div>
    
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card tale-bg same-size-card p-3">
            <div class="card-people mt-auto text-center">
                <img src="{{ asset('asset/images/dashboard/people.svg') }}" alt="people">
                <div class="webinar-info mt-3">
                    <ul class="webinar-details text-justify">
                        <li><strong>Nama Webinar:</strong> Pengenalan AI</li>
                        <li><strong>Nama Pemateri:</strong> Dr. Siti Nurbaya</li>
                        <li><strong>Lokasi:</strong> Kampus A, Surabaya</li>
                        <li><strong>Waktu:</strong> Minggu, 16 Desember 2024 - 13:00 WIB</li>
                    </ul>
                    {{-- <button class="btn btn-primary mt-3" onclick="window.location.href='{{ route('pembeli.modal') }}'" style="color: white;">
                      Daftar Webinar
                    </button> --}}
                  
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Anggota Himatif</p>
              <div class="d-flex flex-wrap mb-5">
                <div class="mr-5 mt-3">
                  <p class="text-muted">Order value</p>
                  <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                </div>
                <div class="mr-5 mt-3">
                  <p class="text-muted">Orders</p>
                  <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                </div>
                <div class="mr-5 mt-3">
                  <p class="text-muted">Users</p>
                  <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                </div>
                <div class="mt-3">
                  <p class="text-muted">Downloads</p>
                  <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                </div> 
              </div> 
              <canvas id="order-chart"></canvas>
            </div>
          </div>
        </div> --}}
        {{-- <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
             <div class="d-flex justify-content-between">
              <p class="card-title">Grafik Keuangan</p>
              <a href="#" class="text-info">View all</a>
             </div>
              <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
              <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
              <canvas id="sales-chart"></canvas>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
{{-- </div>  --}}

@endsection
