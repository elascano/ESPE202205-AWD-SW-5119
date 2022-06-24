import { Component } from '@angular/core';
import { Comments } from './classes/comments';
import { freeApiService } from './services/freeapi.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.less']
})
export class AppComponent {
  title = 'my-first-project';
  constructor(private _freeApiService:freeApiService){}
  lstcomments:Comments[] | undefined;
  ngOnInit(){
    this._freeApiService.getcomments().subscribe
    (data=> {this.lstcomments=data})
  }
}
