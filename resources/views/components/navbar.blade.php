    <nav class="d-flex justify-content-between align-items-center m-3">
        <div class="d-flex gap-2">
            <form action="{{ route('buku.index') }}" method="GET">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <button class="dropdown-item" type="submit" name="order" value="ascending">
                                Ascending
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item" type="submit" name="order" value="descending">
                                Descending
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item" type="submit" name="order" value="5newest">
                                5 Newest
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item" type="submit" name="order" value="5oldest">
                                5 Oldest
                            </button>
                        </li>
                    </ul>
                </div>
            </form>
            <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambahkan Buku</a>
        </div>

        <form action={} method="GET">
            <input type="text" name="q" placeholder="Cari penulis..." value='{{$keyword ?? ''}}'/>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        
        <div>
            <form action="" method="GET">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" >
                        Pilih Penulis
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="text-decoration-none text-black dropdown-item fw-bold" type="submit" name="penulis" value="Semua Penulis">Semua Penulis</button></li>
                        @foreach ($data_buku_semua as $index => $buku)
                        <li>
                            <button type="submit" name="penulis" value="{{ $buku->penulis }}" class="dropdown-item">
                                {{ $buku->penulis }}
                            </button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </form>
        </div>
    </nav>