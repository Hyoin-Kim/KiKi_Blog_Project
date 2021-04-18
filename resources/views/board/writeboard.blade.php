
                <tr class="board-tr" data-id="{{$board->id}}">
                    <td>
                        
                    </td>
                    <td>
                        {{ $board->title }}
                    </td>
                    <td>
                        {{ $board->content}}
                    </td>
                    <td>
                        {{ Auth::user()->name }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning"  onclick="editBoard({{ $board }})"><i class="fas fa-pencil-alt"></i></button>

                    </td>                    
                    <td>
                         <button type="button" class="btn btn-warning"><i class="far fa-trash-alt" onclick="removeBoard(this)"></i></button>
                    </td>
                </tr>


