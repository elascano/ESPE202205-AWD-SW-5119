import { Component } from '@angular/core';
import { Comment } from './class/comment';
import { freeApiService } from './services/freeApi.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'my-first-project';
  constructor(private _freeApService: freeApiService) { }
  lstcomments: Comment[] | undefined;
  ngOnInit() {
    this._freeApService.getComment().subscribe
      (data => { this.lstcomments = data });
  }
}
