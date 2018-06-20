{{--
 * @author      Archie, Disono (webmonsph@gmail.com)
 * @link        https://github.com/disono/Laravel-Template
 * @lincense    https://github.com/disono/Laravel-Template/blob/master/LICENSE
 * @copyright   Webmons Development Studio
--}}

@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h1 class="header">{{ $view_title }}</h1>

                        @include('admin.settings.menu')
                        @include('admin.settings.setting.menu')
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <form action="{{ route('admin.setting.store') }}" method="post"
                              v-on:submit.prevent="onFormUpload">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="name">Name <strong class="text-danger">*</strong></label>

                                    <input id="name" type="text"
                                           class="form-control{{ hasInputError($errors, 'name') }}"
                                           name="name" value="{{ old('name') }}" data-validate="required">

                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="key">Key <strong class="text-danger">*</strong></label>

                                    <input id="key" type="text"
                                           class="form-control{{ hasInputError($errors, 'key') }}"
                                           name="key" value="{{ old('key') }}" data-validate="required">

                                    @if ($errors->has('key'))
                                        <div class="invalid-feedback">{{ $errors->first('key') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="value">Default Value</label>

                                    <input id="value" type="text"
                                           class="form-control{{ hasInputError($errors, 'value') }}"
                                           name="value" value="{{ old('value') }}">

                                    @if ($errors->has('value'))
                                        <div class="invalid-feedback">{{ $errors->first('value') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <label for="description">Description</label>

                                    <textarea class="form-control{{ hasInputError($errors, 'description') }}"
                                              name="description" id="description" cols="30"
                                              rows="2">{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-3 col-sm-12 mb-3">
                                    <label for="input_type">Input Type <strong class="text-danger">*</strong></label>

                                    <select name="input_type" id="input_type"
                                            class="form-control{{ hasInputError($errors, 'input_type') }}"
                                            data-validate="required">
                                        <option value="text">Text</option>
                                        <option value="select">Select</option>
                                        <option value="checkbox">Checkbox</option>
                                    </select>

                                    @if ($errors->has('input_type'))
                                        <div class="invalid-feedback">{{ $errors->first('input_type') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-3 col-sm-12 mb-3">
                                    <label for="input_value">Input Value</label>

                                    <input id="input_value" type="text"
                                           class="form-control{{ hasInputError($errors, 'input_value') }}"
                                           name="input_value" value="{{ old('input_value') }}">

                                    @if ($errors->has('input_value'))
                                        <div class="invalid-feedback">{{ $errors->first('input_value') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <label for="attributes">Attributes</label>

                                    <textarea class="form-control" name="attributes" id="attributes"
                                              cols="30" rows="2">{{ old('attributes') }}</textarea>

                                    @if ($errors->has('attributes'))
                                        <div class="invalid-feedback">{{ $errors->first('attributes') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="is_disabled"
                                               name="is_disabled" {{ frmIsChecked('is_disabled', 1) }} value="1">
                                        <label class="custom-control-label" for="is_disabled">
                                            Disabled
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-raised btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection