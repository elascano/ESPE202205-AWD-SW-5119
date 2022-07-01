import { Component } from '@angular/core';
import { Comments } from './classes/comments';
import { freeApiservice } from './service/freeapi.service';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'my-first-project';
  constructor(private _freeAppService:freeApiservice){}
  lstcomments:Comments[]|undefined;
  ngOnInit(){
    this._freeAppService.getcomments().subscribe
    (data=>{this.lstcomments=data});
  }
}
