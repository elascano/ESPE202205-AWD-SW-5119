import { Component } from '@angular/core';
import { Comments } from './class/comments';
import { freeApiService } from './service/freeapi.service';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'my-first-project';
  constructor(private _freeApservice:freeApiService){}
  lstcomments:Comments[] | undefined;
  ngOnInit()
  {
    this._freeApservice.getComments().subscribe
    (data=>{this.lstcomments=data});
  }
}
