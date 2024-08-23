                                
                                
                                
                                <label for="tags" class="form-label">{{ __('Tags') }}</label>
                                    <div class="col-md-12">
                                        <select  name="tags[]" id="tags" class="form-control select2"
                                            multiple>
                                            {{-- <option value="" disabled>{{ __('Select one or more tags') }}</option> --}}
                                            @foreach ($tags as $tag)
                                            <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div> 

<script>
        $('.select2').select2();
</script>