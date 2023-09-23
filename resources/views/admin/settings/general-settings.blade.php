<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.update-general-settings') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Site Name</label>
                    <input type="text" class="form-control" name="site_name"
                        value="{{ @$generalSettings->site_name }}">
                </div>
                <div class="form-group">
                    <label for="">Contact Email</label>
                    <input type="text" class="form-control" name="contact_email"
                        value="{{ @$generalSettings->contact_email }}">
                </div>
                <div class="form-group">
                    <label for="">Layout</label>
                    <select name="layout" id="" class="form-control">
                        <option {{ @$generalSettings->layout == 'rtl' ? 'selected' : '' }} value="rtl">RTL</option>
                        <option {{ @$generalSettings->layout == 'ltr' ? 'selected' : '' }} value="ltr">LTR</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Default Currency Name</label>
                    <select name="currency_name" id="" class="form-control select2">
                        <option value="">select</option>
                        @foreach (config('settings.currency_list') as $currency)
                            <option {{ @$generalSettings->currency_name == $currency ? 'selected' : '' }}
                                value="{{ $currency }}">{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Currency Icon</label>
                    <input type="text" class="form-control" name="currency_icon"
                        value="{{ @$generalSettings->currency_icon }}">
                </div>
                <div class="form-group">
                    <label for="">TimeZone</label>
                    <select name="time_zone" id="" class="form-control select2">
                        <option value="">select</option>
                        @foreach (config('settings.time_zone_list') as $key => $timeZone)
                            <option {{ @$generalSettings->time_zone == $key ? 'selected' : '' }}
                                value="{{ $key }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>
                <Button type="submit" class="btn btn-primary">Update</Button>
            </form>
        </div>
    </div>
</div>
