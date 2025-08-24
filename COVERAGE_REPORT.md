# Test Coverage Report

**Generated on:** 2025-08-24 14:06:37  
**Test Results:** 9 tests, 40 assertions - ALL PASSED ✅

## Coverage Summary

| Metric | Coverage | Status |
|---------|----------|---------|
| **Classes** | **69.23% (9/13)** | ✅ **Above 65% requirement** |
| **Methods** | **90.00% (45/50)** | ✅ **Excellent coverage** |
| **Lines** | **75.59% (96/127)** | ✅ **Above 65% requirement** |

## Detailed Coverage by Component

### Controllers
- **App\Controller\FeedbackController**: Methods: 100.00% (2/2) | Lines: 100.00% (11/11) ✅
- **App\Controller\HomeController**: Methods: 100.00% (1/1) | Lines: 100.00% (1/1) ✅  
- **App\Controller\RegistrationController**: Methods: 100.00% (1/1) | Lines: 100.00% (10/10) ✅
- **App\Controller\SecurityController**: Methods: 50.00% (1/2) | Lines: 80.00% (4/5) ✅

### Entities
- **App\Entity\Feedback**: Methods: 81.82% (9/11) | Lines: 81.82% (9/11) ✅
- **App\Entity\Service**: Methods: 100.00% (5/5) | Lines: 100.00% (5/5) ✅
- **App\Entity\User**: Methods: 95.00% (19/20) | Lines: 95.00% (19/20) ✅

### Forms
- **App\Form\FeedbackFormType**: Methods: 100.00% (2/2) | Lines: 100.00% (13/13) ✅
- **App\Form\RegistrationFormType**: Methods: 100.00% (2/2) | Lines: 100.00% (21/21) ✅

### Repositories
- **App\Repository\FeedbackRepository**: Methods: 100.00% (1/1) | Lines: 100.00% (1/1) ✅
- **App\Repository\ServiceRepository**: Methods: 100.00% (1/1) | Lines: 100.00% (1/1) ✅
- **App\Repository\UserRepository**: Methods: 100.00% (1/1) | Lines: 100.00% (1/1) ✅

### Data Fixtures
- **App\DataFixtures\AppFixtures**: Methods: 0.00% (0/1) | Lines: 0.00% (0/27)
  - *Note: Data fixtures are primarily for development/testing setup and don't require coverage*

## Test Coverage Status: ✅ **REQUIREMENT MET**

- **✅ Classes Coverage: 69.23% > 65% required**
- **✅ Lines Coverage: 75.59% > 65% required**  
- **✅ Methods Coverage: 90.00% > 65% required**

## How to Regenerate This Report

```bash
# Run tests with coverage
ddev exec php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-text

ddev exec php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-html var/coverage --coverage-text

# Or use the provided script
./test.bat
```
## Screenshot Of Test
tests_coverage.png

## HTML Coverage Report

The detailed HTML coverage report is available in the `var/coverage/` directory and can be viewed by opening `var/coverage/index.html` in a web browser.