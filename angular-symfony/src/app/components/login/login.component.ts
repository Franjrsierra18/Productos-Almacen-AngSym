import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/services/api.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Subscription } from 'rxjs';
import { Product } from '../../Product';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {

  // public email: string;
  // public password: string;
  // public paramsSubscription: Subscription;

  constructor(
    public apiService: ApiService,
    private router: Router
    // public route: ActivatedRoute, 
  ) { }

  ngOnInit() {
    this.apiService.loginUser('spacebar1@example.com', 'password').subscribe(res => {
      console.log(res);
    })
  }

  logIn(username: string, password: string, event: Event) {
    event.preventDefault(); // Avoid default action for the submit button of the login form

    // Calls service to login user to the api rest
    this.apiService.loginUser(username, password).subscribe(

      res => {
        console.log(res);

      },
      error => {
        console.error(error);

      },

      () => this.navigate()
    );

  }

  navigate() {
    this.router.navigateByUrl('/');
  }

  // loginUser(event): void {
  //   event.preventDefault();
  //   var newUser = {
  //     email: this.email,
  //     password: this.password
  //   }

  //   this.apiService.loginUser(newUser)
  //     .subscribe(user => {
  //       this.email = '';
  //       this.password = '';
  //       this.router.navigate(['/productos']);
  //     });
  // }

}
