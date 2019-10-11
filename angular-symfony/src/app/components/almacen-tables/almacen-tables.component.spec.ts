import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AlmacenTablesComponent } from './almacen-tables.component';

describe('AlmacenTablesComponent', () => {
  let component: AlmacenTablesComponent;
  let fixture: ComponentFixture<AlmacenTablesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AlmacenTablesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AlmacenTablesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
