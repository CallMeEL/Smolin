<div class="col-2"></div>

                <div class="col-8 my-5 transparent-form-profile border-grey border-rounded">
                    <div class="form-floating mb-3 mt-3">

                        <form method="get" action="{{ route('home') }}">
                            <div class="row">

                                {{-- Nama Kendaraan --}}
                                <div class="col-4">
                                    <h4>Nama Kendaraan</h4>

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="nama_motor" placeholder="Nama Kendaraan"
                                        aria-label="Nama Kendaraan" name="Motor"
                                        value="{{ request('Motor') }}">
                                    </div>

                                </div>

                                {{-- Harga --}}
                                <div class="col-4">
                                    <h4>Harga</h4>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text" class="form-control" id="harga_tinggi" placeholder="Harga Max"
                                            aria-label="Harga Max" name="Harga"
                                            value="{{ request('Harga') }}">
                                    </div>

                                </div>

                                <div class="col-4">
                                    <h4>Transmisi</h4>

                                    <div class="input-group mb-3">
                                        <select class="form-select" id="transmisi" name="Transmisi">
                                            <option value="">--Pilih--</option>
                                            <option value="Bebek" {{ request('Transmisi') == 'Bebek' ? 'selected' : '' }}>
                                                Bebek</option>
                                            <option value="Matic" {{ request('Transmisi') == 'Matic' ? 'selected' : '' }}>
                                                Matic</option>
                                            <option value="Kopling" {{ request('Transmisi') == 'Kopling' ? 'selected' : '' }}>
                                                Kopling</option>
                                        </select>
                                    </div>

                                </div>

                            </div>

                            <button type="submit" class="btn colorpink button-press-pink text-white btn-block">Search</button>

                        </form>
                    </div>
                </div>

                <div class="col-2"></div>
