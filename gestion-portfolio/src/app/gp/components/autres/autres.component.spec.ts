import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AutresComponent } from './autres.component';

describe('AutresComponent', () => {
  let component: AutresComponent;
  let fixture: ComponentFixture<AutresComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AutresComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AutresComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
