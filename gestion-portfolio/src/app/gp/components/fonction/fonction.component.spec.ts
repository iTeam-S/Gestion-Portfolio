import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FonctionComponent } from './fonction.component';

describe('FonctionComponent', () => {
  let component: FonctionComponent;
  let fixture: ComponentFixture<FonctionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FonctionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FonctionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
