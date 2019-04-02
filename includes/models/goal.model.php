<?php
/**
 * Created by PhpStorm.
 * User: nairav
 * Date: 27/03/2019
 * Time: 16:01
 */

class Goal {

  public static function getAll() {

    $token = $GLOBALS['key'];
    $ch = curl_init($GLOBALS['url']);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json  charset=utf-8',
      'Authorization: Bearer ' . $token
    ));

    $data = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

//    $data = '{
//  "avatar_id": "e64c5f6e-8469-49d9-a5d8-d7e7cd014ee8",
//  "avatar": {
//    "profile": {
//      "persons": [
//        {
//          "name": "John Doe",
//          "birthdate": "1984-01-01T00:00:00",
//          "gender": "Undefined",
//          "household_member": "HeadOfHousehold",
//          "state_of_residence": "OH",
//          "risk_tolerance": "Balanced",
//          "tax_filing_status": "Single",
//          "id": "62077e6c-3f5b-40a4-97b0-65a3cfe81f68",
//          "image_url": null,
//          "reference_id": null
//        }
//      ]
//    },
//    "life_objects": {
//      "cash_accounts": [
//        {
//          "start_balance": 20000,
//          "name": null,
//          "id": "42e09f95-b5b3-40cb-833c-bc06d61fd495",
//          "reference_id": null
//        }
//      ],
//      "rent_expenses": [
//        {
//          "amount": 2000,
//          "name": "Rent",
//          "id": "93a299a4-a007-4d5c-a2b9-160b73ae57f3",
//          "reference_id": null
//        }
//      ],
//      "living_expenses": [
//        {
//          "amount": 4000,
//          "name": "Living Expenses",
//          "id": "e4a7eac0-6373-4610-bb8d-c0cf7b5a821e",
//          "reference_id": null
//        }
//      ],
//      "discretionary_expenses": [
//        {
//          "amount": 2000,
//          "name": "Entertainment and Hobbies",
//          "variability": 0,
//          "id": "7eec63a3-4b67-4a9d-9955-a8ff7c710884",
//          "reference_id": "00000000-0000-0000-0000-000000000000"
//        }
//      ],
//      "houses": [],
//      "incomes": [
//        {
//          "amount": 180000,
//          "name": "Income",
//          "id": "6b639907-58a0-46b5-8891-92a0839f0c25",
//          "reference_id": null
//        }
//      ],
//      "investment_accounts": [
//        {
//          "initial_balance": 100000,
//          "id": "e48cc6b9-7587-4b9e-85d2-c3bd944ebcfb",
//          "reference_id": null
//        }
//      ],
//      "retirement_accounts": [
//        {
//          "initial_balance": 50000,
//          "id": "7573961f-f04f-441d-978a-d57d62ae817c",
//          "reference_id": null
//        }
//      ],
//      "plan529_accounts": [],
//      "mortgages": [],
//      "student_loans": [
//        {
//          "name": "Student Loan",
//          "loan_term": 10,
//          "amount": 50000,
//          "interest_rate": 5,
//          "inception_date": "2015-06-01T00:00:00",
//          "id": "3f110036-4db6-4bb5-9f07-7995f6ef18a9",
//          "reference_id": null
//        }
//      ],
//      "personal_loans": [],
//      "credit_cards": []
//    },
//    "goals": {
//      "wealth_goals": [
//        {
//          "name": "Target wealth",
//          "age": 50,
//          "amount": 500000,
//          "priority": "Low",
//          "id": "869d8361-eb0c-402a-8fdf-e63486894b37",
//          "image_url": null,
//          "reference_id": null
//        }
//      ],
//      "retirement_goals": [
//        {
//          "name": "Retirement",
//          "age": 65,
//          "priority": "High",
//          "percent_expenses": 90,
//          "legacy_amount": 0,
//          "id": "bce616cc-89fb-4a1f-9785-7c6743b1c8ed",
//          "image_url": null,
//          "reference_id": null
//        }
//      ],
//      "continued_education_goals": [],
//      "college_education_goals": [
//        {
//          "name": "College Education",
//          "target_date": "2028-02-08T16:22:14",
//          "amount": 100000,
//          "end_date": "0001-01-01T00:00:00",
//          "duration": 48,
//          "priority": "High",
//          "id": "594e1b2e-88b3-4407-95c6-ecf8380fbd09",
//          "image_url": null,
//          "reference_id": null
//        }
//      ],
//      "spending_goals": [],
//      "wedding_goals": [],
//      "vacation_goals": [],
//      "house_goals": [
//        {
//          "name": "House",
//          "start_date": "2021-03-14T00:41:37",
//          "related_expenses": "Rent",
//          "primary_residence": true,
//          "downpayment": 20,
//          "loan_term": "30 year fixed",
//          "amount": 700000,
//          "end_date": "2026-03-14T00:41:37",
//          "priority": "Medium",
//          "id": "96f272d5-6859-4eb7-961e-a45ad9131166",
//          "image_url": null,
//          "reference_id": null
//        }
//      ],
//      "car_goals": [],
//      "purchase_goals": [],
//      "emergency_funds": []
//    }
//  },
//  "results": {
//    "avatar_results": {
//      "wellness_score": 66,
//      "wellness_state": [
//        0.995,
//        0.005,
//        0
//      ]
//    },
//    "goal_results": [
//      {
//        "id": "96f272d5-6859-4eb7-961e-a45ad9131166",
//        "achievability": 55,
//        "expected_time": 3.5,
//        "expected_value": 4713.273173264278,
//        "state": [
//          1,
//          0,
//          0
//        ],
//        "wellness_contribution": 16.923076923076923
//      },
//      {
//        "id": "594e1b2e-88b3-4407-95c6-ecf8380fbd09",
//        "achievability": 100,
//        "expected_time": 9,
//        "expected_value": 2083.333333333333,
//        "state": [
//          0,
//          0,
//          1
//        ],
//        "wellness_contribution": 30.76923076923077
//      },
//      {
//        "id": "869d8361-eb0c-402a-8fdf-e63486894b37",
//        "achievability": 63,
//        "expected_time": null,
//        "expected_value": null,
//        "state": [
//          0,
//          0,
//          1
//        ],
//        "wellness_contribution": 4.846153846153846
//      },
//      {
//        "id": "bce616cc-89fb-4a1f-9785-7c6743b1c8ed",
//        "achievability": 43,
//        "expected_time": null,
//        "expected_value": null,
//        "state": [
//          1,
//          0,
//          0
//        ],
//        "wellness_contribution": 13.230769230769232
//      }
//    ],
//    "current_financials": {
//      "income_statement": [
//        {
//          "category": "Income",
//          "sub_category": null,
//          "name": "Cash Account",
//          "current_month_value": 28.500000000000377,
//          "annual_value": 28.500000000000377
//        },
//        {
//          "category": "Expense",
//          "sub_category": "Nondiscretionary",
//          "name": "Rent",
//          "current_month_value": -2000,
//          "annual_value": -24221.412303563295
//        },
//        {
//          "category": "Expense",
//          "sub_category": "Nondiscretionary",
//          "name": "Living Expenses",
//          "current_month_value": -4000,
//          "annual_value": -48442.82460712659
//        },
//        {
//          "category": "Expense",
//          "sub_category": "Nondiscretionary",
//          "name": "Entertainment and Hobbies",
//          "current_month_value": -2000,
//          "annual_value": -24221.412303563295
//        },
//        {
//          "category": "Expense",
//          "sub_category": "Liabilities",
//          "name": "Student Loan",
//          "current_month_value": -530.3275761953784,
//          "annual_value": -6363.930914344532
//        },
//        {
//          "category": "Income",
//          "sub_category": null,
//          "name": "Salary",
//          "current_month_value": 15000,
//          "annual_value": 180453.04968195123
//        },
//        {
//          "category": "Expense",
//          "sub_category": "Tax",
//          "name": "Tax Accrued",
//          "current_month_value": -4308.710433269917,
//          "annual_value": -51704.52519923901
//        },
//        {
//          "category": "TaxBalance",
//          "sub_category": "Tax",
//          "name": "Underpaid Tax",
//          "current_month_value": 0,
//          "annual_value": 5077.889274798123
//        }
//      ],
//      "balance_sheet": [
//        {
//          "category": "Assets",
//          "name": "Cash Flows",
//          "value": 20000,
//          "liquid_value": 20000
//        },
//        {
//          "category": "Assets",
//          "name": "InvAccount Taxable",
//          "value": 100000,
//          "liquid_value": 100000
//        },
//        {
//          "category": "Assets",
//          "name": "InvAccount TraditionalIRA",
//          "value": 50000,
//          "liquid_value": 0
//        },
//        {
//          "category": "Liabilities",
//          "name": "Liabilities",
//          "value": -34099.115798254745,
//          "liquid_value": -6363.9309143445325
//        }
//      ]
//    },
//    "guidance": {
//      "expense_management": [],
//      "capital_allocation": [
//        {
//          "action_name": "Withdraw",
//          "object_name": "Cash Account",
//          "current_month_value": 20000,
//          "annual_value": 20000,
//          "description": "Cash from Savings"
//        },
//        {
//          "action_name": "Deposit",
//          "object_name": "InvAccount Taxable",
//          "current_month_value": 26498.172423804623,
//          "annual_value": 50605.3336289126,
//          "description": "Cash to Investments"
//        }
//      ],
//      "investment_allocation": [],
//      "credit": []
//    }
//  }
//}';
    return json_decode($data,true);
  }
}