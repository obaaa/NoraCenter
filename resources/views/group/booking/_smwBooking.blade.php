<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"><hr>
  @foreach ($smwBooking as $key => $classroom)
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{ $loop->index+1000 }}" aria-expanded="true" aria-controls="{{ $loop->index+1000 }}">
            {{ $key }}
          </a>
        </h4>
      </div>
      <div id="{{ $loop->index+1000 }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <table class="table table-hover table-striped table-bordered">
            <thead>
              <th>#</th>
              <th>Time</th>
              <th>reservation from day</th>
            </thead>
              @foreach ($classroom as $classroom_lecture)
                <tbody>
                  <td>
                    <input type="radio" name="classroom_lecture" required value="{{ $classroom_lecture['id'] }},{{ $classroom_lecture['reservation_from_day'] }},smwBooking"></input>
                  </td>
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
