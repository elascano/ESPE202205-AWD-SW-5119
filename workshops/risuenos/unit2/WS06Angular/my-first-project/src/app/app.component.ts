import { Component } from '@angular/core';
import { Comments } from './classes/comments';
import { freeApiService } from './services/freeapi.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'my-first-project';
  constructor(private _freeApService:freeApiService){}
  lstcomments:Comments[] | undefined;
  ngOnInit() {
    this._freeApService.getcomments().subscribe
    (data=>{this.lstcomments=data})
  }
}
