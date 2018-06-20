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
                <h1 class="header">{{ $view_title }}</h1>
                <hr>

                @include('admin.user.menu')
            </div>
        </div>

        <div class="row">
            <div class="col mt-3">
                <form method="get" action="{{ route('admin.user.index') }}">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <input type="text" class="form-control" placeholder="Search"
                                   name="search" value="{{ request('search') }}">
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <select class="custom-select" name="role_id">
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ frmIsSelected('role_id', $role->id) }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table mt-3">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Email Verified</th>
                        <th>Account Activated</th>
                        <th>Account Enabled</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $row)
                        <tr id="parent_tr_{{$row->id}}">
                            <th>{{ $row->id }}</th>
                            <td>{{ $row->full_name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->role }}</td>
                            <td>
                                <a href="{{ url('admin/user/update/' . $row->id . '/is_email_verified/' . (($row->is_email_verified) ? 0 : 1)) }}">
                                    {{ ($row->is_email_verified) ? 'YES' : 'NO' }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('admin/user/update/' . $row->id . '/is_account_activated/' . (($row->is_account_activated) ? 0 : 1)) }}">
                                    {{ ($row->is_account_activated) ? 'YES' : 'NO' }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('admin/user/update/' . $row->id . '/is_account_enabled/' . (($row->is_account_enabled) ? 0 : 1)) }}">
                                    {{ ($row->is_account_enabled) ? 'YES' : 'NO' }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cog"></i>
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{ url('admin/user/edit/' . $row->id) }}">Edit</a>

                                        <a class="dropdown-item"
                                           href="{{ route('admin.user.authentication.history', ['user_id' => $row->id]) }}">
                                            Authentication Histories
                                        </a>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item"
                                           href="{{ url('admin/user/destroy/' . $row->id) }}"
                                           v-on:click.prevent="onDeleteResource($event, '#parent_tr_{{$row->id}}')">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if(!count($users))
                    <h3 class="text-center"><i class="far fa-frown"></i> No Users Created.</h3>
                @endif

                {{$users->appends($request->all())->render()}}
            </div>
        </div>
    </div>
@endsection