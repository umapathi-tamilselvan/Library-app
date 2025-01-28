<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-left: 25%; padding-top: 20px;">
    <div class="py-4">
        <div class="container" style="max-width: 600px;">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <h3 class="mb-0">Add New Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/category') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Category</label>
                            <input type="text" class="form-control" id="name"  value="{{ old('name') }}"  name="name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
