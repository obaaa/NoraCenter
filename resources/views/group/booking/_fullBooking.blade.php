<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"><hr>
  @foreach ($fullBooking as $key => $classroom)
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{ $loop->index }}" aria-expanded="true" aria-controls="{{ $loop->index }}">
            {{ $key }}
          </a>
        </h4>
      </div>
      <div id="{{ $loop->index }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <th>#</th>
              {{-- <th>Classroom</th> --}}
              <th>Time</th>
              <th>reservation from day</th>
            </thead>
              @foreach ($classroom as $classroom_lecture)
                <tbody>
                  <td>
                    <input type="radio" name="classroom_lecture" required value="{{ $classroom_lecture['id'] }},{{ $classroom_lecture['reservation_from_day'] }},fullBooking"></input>
                  </td>
                  {{-- <td>
                    {{ $classroom_lecture['classroom'] }}
                  </td> --}}
                  <td>
                    {{ $classroom_lecture['lecture_start_time'] }} - {{ $classroom_lecture['lecture_end_time'] }}
                  </td>
                  <td>
                    {{ $classroom_lecture['reservation_from_day'] }}
                  </td>
                </tbody>
              @endforeach
          </table>
        </div>
      </div>
    </div>
  @endforeach
</div>
