import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AutresSectionComponent } from './autres-section.component';

describe('AutresSectionComponent', () => {
  let component: AutresSectionComponent;
  let fixture: ComponentFixture<AutresSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AutresSectionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AutresSectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
