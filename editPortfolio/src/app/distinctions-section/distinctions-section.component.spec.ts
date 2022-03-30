import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DistinctionsSectionComponent } from './distinctions-section.component';

describe('DistinctionsSectionComponent', () => {
  let component: DistinctionsSectionComponent;
  let fixture: ComponentFixture<DistinctionsSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DistinctionsSectionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DistinctionsSectionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
