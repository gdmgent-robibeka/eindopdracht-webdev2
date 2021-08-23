<form method="POST" action="{{ route('pages.contact') }}">
    @csrf

    <div class="mb-3">
        <label for="name">
            @lang('app.form.name')*
        </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">
            @lang('app.form.email')*
        </label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="subject">
            @lang('app.form.subject')*
        </label>
        <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}">
        @error('subject')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">
            @lang('app.form.content')*
        </label>
        <textarea class="form-control" id="content" rows="3" name="content" value="{{ old('content') }}"></textarea>
        @error('content')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Verzend
        </button>
    </div>

</form>
