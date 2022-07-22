import { Component } from '@angular/core';
import { Users } from './classes/users';
import { freeApiService } from './services/freeapi.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'my-first-proyect';
  constructor(private _freeApService:freeApiService){}
    lstusers:Users[] | undefined;
    ngOnInit()
    {
      this._freeApService.getcomments().subscribe
      (data=>{this.lstusers=data})
    }
  }

