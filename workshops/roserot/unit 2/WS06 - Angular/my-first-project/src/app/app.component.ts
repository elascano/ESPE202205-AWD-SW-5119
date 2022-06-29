import { Component } from '@angular/core';
import { Comments } from './classes/comments';
import { freeApiServvice } from './services/freeapi.service';



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'my-first-project';
  constructor(private _freeApiService: freeApiServvice){}
  lstcomments:Comments[] | undefined;
  ngOnInit()
  {
    this._freeApiService.getComments().subscribe
    (data=> {this.lstcomments=data});
  }
}
