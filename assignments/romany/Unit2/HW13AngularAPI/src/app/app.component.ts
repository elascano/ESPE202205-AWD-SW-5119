import { Component } from '@angular/core';
import { Philosophy } from './class/philosophy';
import { phylosophy } from './service/philosophy.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'BitCoinProject';
  
  constructor(private _freeApService: phylosophy) { }
  bitcoins: Philosophy[] | undefined;
  ngOnInit() {
    this._freeApService.getInfo().subscribe
      (data => this.bitcoins=data);
  }
}
